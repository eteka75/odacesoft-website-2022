<template>
  <Header menu="Login" />
  <Head>
    <title>Créeation de compte • Odacesoft</title>
    <meta
      head-key="description"
      name="description"
      content="Odacesoft est une entreprise informatique spécialisée dans l'ingénierie Informatique et l'incubation d'idées innovantes."
    />
  </Head>
  <cover-layout>
    <div class="bg-surface-secondary">
      <jet-authentication-card class="">
        <div class="py-">
        <div
                  class="
                    group-forms
                    p-6 px-lg-8 py-lg-8 rounded-3 bg-white
                    border-1 border-secondary
                    shadow-xl
                    border border-1
                    group-auth-formscomponent-form-login-1
                  "
                  id="component-shot"
                >

        <div >
          
          <div class="py-3 mb-4 border-bottom">
            <h3 class="mb-0">Création de compte</h3>
            <div class="text-xs text-muted"> La création de compte vous permet d'avoir acces à plus de services.</div>

          </div>
          <jet-validation-errors class="mb-3" />

          <form @submit.prevent="submit">
            <div class="form-group">
              <jet-label for="name" value="Nom et Prénom(s)" />
              <jet-input
                id="name"
                type="text"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
              />
            </div>

            <div class="form-group">
              <jet-label for="email" value="Votre e-mail" />
              <jet-input
                id="email"
                type="email"
                v-model="form.email"
                required
              />
            </div>

            <div class="form-group">
              <jet-label for="password" value="Mot de passe" />
              <jet-input
                id="password"
                type="password"
                v-model="form.password"
                required
                autocomplete="new-password"
              />
            </div>

            <div class="form-group">
              <jet-label for="password_confirmation" value="Confirmation" />
              <jet-input
                id="password_confirmation"
                type="password"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
              />
            </div>

            <div
              class="form-group"
              v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
            >
              <div class="custom-control py-3 text-center text-sm custom-checkbox">
                <jet-checkbox
                  name="terms"
                  id="terms"
                  v-model:checked="form.terms"
                />

                <label class="custom-control-label mx-2" for="terms">
                  J'accepte les
                  <a target="_blank" :href="route('terms.show')"
                    >Terms du service</a
                  >
                  la
                  <a target="_blank" :href="route('policy.show')"
                    >Politique de confidentialité</a
                  >
                </label>
              </div>
            </div>

            <div class="mb-0">
              <div class="d-flex justify-content-end align-items-center">
              
              <div class="col py-4">
                <jet-button
                  class="ml-4 btn btn-lg rounded-5 px-3 py-2 btn-success d-block"
                  :class="{ 'text-white-50': form.processing }"
                  :disabled="form.processing"
                >
                  Créer mon compte 
                </jet-button>
                </div>
                <div class="col text-xs py-2">
                <inertia-link
                  :href="route('login')"
                  class="text-muted mr-3 text-decoration-none"
                >
                  Déjà inscrit?, connectez-vous.
                </inertia-link> 
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
    </div>
      </jet-authentication-card>
    </div>
  </cover-layout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Header from "@/Components/Header";
import CoverLayout from "@/Layouts/CoverLayout";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
  components: {
    JetAuthenticationCard,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Header,
    CoverLayout,
  },

  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
