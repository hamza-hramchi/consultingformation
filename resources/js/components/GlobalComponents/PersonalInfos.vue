<template>
    <div>
        <form class="php-email-form">
                      <h4 class="text-info"><i class="bx bx-user"></i> Les informations personnelles</h4><hr>

                      <div class="form-group">
                        <label for="civilite">Civilité</label>
                        <select v-model="form.civilite" name="civilite" id="civilite" class="form-control" :class="{ 'is-invalid': form.errors.has('civilite') }">
                          <option value="Monsieur">Monsieur</option>
                          <option value="Madame">Madame</option>
                        </select>
                        <has-error :form="form" field="civilite"></has-error>
                      </div>

                      <div class="form-row">
                        <div class="col-md-6 form-group">
                          <input v-model="form.nom"  type="text" name="nom" class="form-control" id="nom" placeholder="Votre Nom" :class="{ 'is-invalid': form.errors.has('nom') }" />
                          <has-error :form="form" field="nom"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                          <input v-model="form.prenom"  type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prénom" :class="{ 'is-invalid': form.errors.has('prenom') }" />
                          <has-error :form="form" field="prenom"></has-error>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-6 form-group">
                        <input  type="email" v-model="form.email" class="form-control" name="email" id="email" placeholder="Votre Email" :class="{ 'is-invalid': form.errors.has('email') }" />
                        <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                          <input type="telephone" v-model="form.telephone" name="telephone" id="telephone" class="form-control" placeholder="Votre numéro de téléphone" :class="{ 'is-invalid': form.errors.has('telephone') }">
                          <has-error :form="form" field="telephone"></has-error>
                        </div>
                      </div>

                        <div class="form-group">
                        <h4><i class="bx bx-list-ul"></i> Service</h4>
                        <select name="service" id="service" v-model="form.service" class="form-control" :class="{ 'is-invalid': form.errors.has('service') }">
                          <option value="Transformation digitale">Transformation digitale</option>
                          <option value="Formation Internet des objets">Formation Internet des objets</option>
                          <option value="Conseil numérique">Conseil numérique</option>
                        </select>
                        <has-error :form="form" field="service"></has-error>
                        </div>
                      
                        <div class="form-group">
                          <textarea v-model="form.message" name="message" id="besoin" cols="30" rows="10" class="form-control" placeholder="Votre besoin !" :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                          <has-error :form="form" field="message"></has-error>
                        </div>

                      <div class="form-row">
                        <div class="custom-control custom-checkbox custom-control-inline">
                          <input required v-model="valid" type="checkbox" class="custom-control-input" id="valid">
                          <label class="custom-control-label" for="valid"> Je confirme la validité des informations personnelles ci-dessus.</label>
                        </div>
                      </div>
                      
                        <div class="form-group">
                          <button @click.prevent="next()" class="form-control btn btn-success">Suivant</button>
                        </div>
                      
                    </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
