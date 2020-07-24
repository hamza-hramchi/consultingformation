<template>
    <div class="">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
            <div class="d-flex justify-content-between align-items-center">
              <h2>Rendez-vous avec un de nos agents</h2>
            </div>
          </div>
        </section><!-- End Breadcrumbs -->

        <div class="map-section">
          <iframe style="border:0; width: 100%; height: 350px;" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=26%20Rue%20DES%20RIGOLES%2075020%20PARIS%2020+(CONSULTING%20FORMATION)&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        </div>

        <section id="contact" class="contact">
          <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
              <div class="col-lg-10">
                <div class="info-wrap">
                  <div class="row">
                    <div class="col-lg-4 info">
                      <i class="icofont-google-map"></i>
                      <h4>Adresse</h4>
                      <p>26 Rue DES RIGOLES<br>75020 PARIS 20, France</p>
                    </div>
                    <div class="col-lg-4 info mt-4 mt-lg-0">
                      <i class="icofont-envelope"></i>
                      <h4>Email</h4>
                      <p>atmane77@yahoo.fr</p>
                    </div>

                    <div class="col-lg-4 info mt-4 mt-lg-0">
                      <i class="icofont-phone"></i>
                      <h4>Téléphone</h4>
                      <p>+33 7 51 32 47 11</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
            <div class="row mt-5 justify-content-center" data-aos="fade-up">
              <div class="section-title" data-aos="fade-up">
                <h2>Rendez-vous chez CONSULTING FORMATION</h2>
                <p class="text-bold">Dans le cadre de l'amélioration  de la relation et de la communication avec ses clients, 
                notre entreprise cherche à fournir le meilleur, et donc vous pouvez prendre rendez-vous, soit par téléphone ou avec 
                l'un de nos salariés dans l'entreprise afin de vous renseigner et de fournir toutes les informations dont vous avez besoin 
                dans chacun des services que nous fournissons</p>
                
                <p class="text-bold">
                  Nous voulons comprendre votre projet, 
                  vos objectifs et vos envies pour vous proposer les solutions qui vous apporteront croissance et sérénité.
                </p>
              </div>

              
                
                
            </div> 

            <form @submit.prevent="saveAppointment" class="php-email-form">
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
                          <input v-model="form.prenom"  type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre Prénom" :class="{ 'is-invalid': form.errors.has('prenom') }" />
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
                        <h4 class="text-info"><i class="bx bx-list-ul"></i> Service</h4>
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

                      
                      <h4 class="text-info"><i class="bx bx-calendar"></i> Date et heure du rendez-vous</h4><hr>
                      <div class="form-group">
                        <input v-model="form.date" v-bind:min="form.today" v-bind:disabledDays="disabledDays" type="date" name="date" id="date" class="form-control" :class="{ 'is-invalid': form.errors.has('date') }">
                        <has-error :form="form" field="date"></has-error>
                      </div>
                      
                      <div class="form-group">
                        <div class="input-group mb-3">
                          
                        <select v-model="form.time" name="time" id="time" class="form-control"  :class="{ 'is-invalid': form.errors.has('time') }">
                          <option value="09:00">09:00</option>
                          <option value="10:00">10:00</option>
                          <option value="11:00">11:00</option>
                          <option value="12:00">12:00</option>
                          <option value="15:00">15:00</option>
                          <option value="16:00">16:00</option>
                          <option value="17:00">17:00</option>
                        </select>
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="bx bx-time"></i></span>
                        </div>
                        </div>
                        <has-error :form="form" field="time"></has-error>
                      </div>

                      <div class="form-row">
                        <div class="custom-control custom-checkbox custom-control-inline">
                          <input required v-model="valid" type="checkbox" class="custom-control-input" id="valid">
                          <label class="custom-control-label" for="valid"> Je confirme la validité des informations personnelles ci-dessus.</label>
                        </div>
                      </div><br>

                      <div class="form-group">
                        <button  class="form-control btn btn-success">Enregistrer</button>
                      </div>
                    </form>

                    <div ref="content" hidden>
                      <h3 class="text-center"><span class="text-success">CONSULTING</span>FORMATION</h3>
                      <hr>
                      <h4>Rendez vous avec {{form.civilite}} : {{form.prenom}} {{form.nom}}</h4>
                      <p>
                        Rendez-vous d'une heure avec un de nos agents.
                        Les informations du rendez-vous
                        Date : {{form.date}} 
                        Heure : {{form.time}} 
                        Service : {{form.service}}
                      </p>
                    </div>


          </div> <!-- End container -->
    </section><!-- End Contact Section -->
    </div>
</template>

<script>
import jsPDF from 'jspdf'

    export default {
        data(){
            return {
                form : new Form({
                  civilite : '',
                  nom : '',
                  prenom : '',
                  email : '',
                  telephone : '',
                  service : '',
                  message : '',
                  date : '',
                  time : '',
                  today : new Date().getFullYear() + '-' + ('0'+(new Date().getMonth()+1)).slice(-2) + '-' + new Date().getDate()
                }),
                valid : false,
                disabledDays : ['sa','di'],
                validateTime : ''
            }
        },

      methods : {
            saveAppointment(){
              let loader = this.$loading.show({
                // Optional parameters
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: true,
                onCancel: this.onCancel,
                color : 'green',
                height : 100,
                width : 100
                });
              this.form.post('/appointment')
                .then((message) => {
                  loader.hide()
                  if(message.data != ''){
                    this.validateTime = message.data
                    Swal.fire({
                    position: 'top',
                    icon: 'warning',
                    title: "L'heure " + this.form.time + 'H est déjà prise, nous vous proposons : ' + this.validateTime,
                    showConfirmButton: false,
                    timer: 5000
                    })
                  }
                  else{
                    this.$Progress.start();
                    Swal.fire({
                        title: 'Rendez-vous avec ' + this.form.civilite + ' ' + this.form.prenom + ' ' + this.form.nom ,
                        text: 'Date : ' + this.form.date + ' | Heure :  ' + this.form.time + ' | Service : ' + this.form.service,
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#25AB20',
                        cancelButtonColor : '#BDB705',
                        confirmButtonText: 'Télécharger le pdf',
                        cancelButtonText : 'Non Merci'
                        }).then((result) => {
                          if(result.value){
                            var doc = new jsPDF('A4');
                            doc.fromHTML(this.$refs.content);
                            doc.save('rendez-vous.pdf');
                          }
                        })
                        this.$Progress.finish();
                  }
                  
                }).catch(() => {
                  this.$Progress.start();
                  this.$Progress.fail();
                  Swal('Erreur', 'Problème servenue !', 'warning');

                })
            },
        },

      mounted() {}
    }
</script>
