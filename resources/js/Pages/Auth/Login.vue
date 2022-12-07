<template>
<Header menu="Login"/>
   <Head>
    <title>Se connecter à mon compte • Odacesoft</title>
    <meta head-key="description" name="description" content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes." />
  </Head>
  <cover-layout>
    <div class="bg-auth opacity-5 p-lg-8 bg-soft-secondary_ ">
      <jet-authentication-card class="">
        <div class="py-5 px-lg-6 shadow border">


          <!--form @submit.prevent="submit">
        <div class="form-group">
          <jet-label for="email" value="Email" />
          <jet-input
            id="email"
            type="email"
            v-model="form.email"
            required
            autofocus
          />
        </div>

        <div class="form-group">
          <jet-label for="password" value="Password" />
          <jet-input
            id="password"
            type="password"
            v-model="form.password"
            required
            autocomplete="current-password"
          />
        </div>

        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <jet-checkbox
              id="remember_me"
              name="remember"
              v-model:checked="form.remember"
            />

            <label class="custom-control-label" for="remember_me">
              Remember Me
            </label>
          </div>
        </div>

        <div class="mb-0">
          <div class="d-flex justify-content-end align-items-baseline">
            <inertia-link
              v-if="canResetPassword"
              :href="route('password.request')"
              class="text-muted mr-3"
            >
              Forgot your password?
            </inertia-link>

            <jet-button
              class="ml-4"
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
            >
              Log in
            </jet-button>
          </div>
        </div>
      </form-->
          <div
            class="
              group-forms
              p-4 px-md-10 px-xl-8 py-lg-8  rounded-3 bg-lg-dangerbg-md-primarybg-xl-dark bg-white
              border-1 shadow-3_
               borderborder-1
              group-auth-formscomponent-form-login-1
            "
            id="component-shot"
          >
            <div class="text-centers mb-4 text-center  pb-2">
              <h2 class="mb-0 p-0">Se connecter</h2>
              <div class="text-muted text-xs mt-n1">Découvrez la joie de construire ensemble...</div>
            </div>
            <form @submit.prevent="submit">
            <jet-validation-errors class="mb-3" />

          <div
            v-if="status"
            class="alert alert-success mb-3 rounded-0"
            role="alert"
          >
            {{ status }}
          </div>
              <div class="mb-5">
                <jet-label class="form-label" value="Email" />
                <jet-input
                  id="email"
                  type="email"
                  v-model="form.email"
                  :disabled="form.processing"
                  required
                  autofocus
                />
              </div>
              <div class="mb-5">
                 <jet-label class="form-label" value="Password" />
                <jet-input
                  id="password"
                  type="password"
                  v-model="form.password"
                  :disabled="form.processing"
                  required
                  autocomplete="current-password"
                />
              </div>
              <div class="d-flex mb-4">
              <div class="col">
                    <div class="form-check form-switch">
                  <input
                    value="1"
                     id="remember_me"
                    class="form-check-input" name="remember"
                   v-model="form.remember"  :error="form.errors.publie"
                   :disabled="form.processing"
                    checked
                    type="checkbox"
                  />
                  <label class="form-check-label" for="remember_me"
                    >Rester connecté</label
                  >
                </div>
                </div>
                <div class="col text-end">
                  <span class="">
                    <inertia-link
                      v-if="canResetPassword"
                      :href="route('password.request')"
                      class="text-muted mr-3"
                    >
                      Mot de passe oublié ?
                    </inertia-link>
                  </span>
                </div>
              </div>
              <div>
                <jet-button
                  class="btn btn-primary w-full"
                  :class="{ 'text-white-50': form.processing }"
                  :disabled="form.processing"
                  :loading="form.processing"
                >   Se connecter
                </jet-button>
              </div>
              <div class="row p-3">
                <div class="col-sm-12 text-center">
                  <inertia-link
                    v-if="canResetPassword"
                    :href="route('register')"
                    class="text-muted mr-3"
                  >
                  <div v-if="loading" class="btn-spinner mr-2" />
                    Créer un compte
                  </inertia-link>
                </div>

              </div>
            </form>
          </div>
        </div>
      </jet-authentication-card>
    </div>
  </cover-layout>
</template>

<script>

import { Head } from '@inertiajs/inertia-vue3'
import Header from "@/Components/Header";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import CoverLayout from "@/Layouts/CoverLayout";

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    Header,
    JetLabel,
    JetValidationErrors,

    CoverLayout,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
      loading:false,
    };
  },

  methods: {
    submit() {
         this.loading=true;
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
          onFinish: () =>  this.loading=false,

        });
    },
  },
};
</script>

