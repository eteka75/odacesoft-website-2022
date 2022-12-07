<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str ;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        $username=$this->generateUsername($input['name']);
        //dd($username);
        return DB::transaction(function () use ($input,$username) {
            return tap(User::create([
                'username' => $username,
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Générer le nom d'utilisateur unique
     */
    protected function generateUsername($n){
        $data=explode(' ',$n);
        $dtext='';
        $dtext=(isset($data[0]))?$data[0]:$dtext;
        $dtext=(isset($data[1]))?$dtext.'.'.$data[1]:$dtext;

        $u=Str ::slug($dtext,'.');//. (User::max('id') + random_int(99, 99999))
        $newu=substr($u,0,20);
        $uexiste=User::where('username',$newu)->first();
        if(!$uexiste){
            return $newu;
        }else{

            $i=1;

            do{
                $newu=$newu."".$i++;
                print_r($u);
            } while(User::where('username',$newu)->first()!=NULL);
            //dd($newu);
        }
        return $newu;
    }
    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
