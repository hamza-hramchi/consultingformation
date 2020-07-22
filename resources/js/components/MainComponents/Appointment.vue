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
                </p> <br>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#AppointmentModal">
                  <i class="bx bx-calendar"></i> Réservez votre 1H de consulting dès maintenant</button>
              </div>
                
                
            </div> 

            <!-- Modal -->
            <div class="modal fade" id="AppointmentModal" tabindex="-1" role="dialog" aria-labelledby="AppointmentModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="AppointmentModalLabel">Rendez-vous chez CONSULTING FORMATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="php-email-form" v-if="step === 1">
                      <h4 class="text-info"><i class="bx bx-user"></i> Les informations personnelles</h4><hr>

                      <div class="form-group">
                        <label for="gender">Civilité</label>
                        <select v-model="form.gender" name="gender" id="gender" class="form-control">
                          <option value="Monsieur">Monsieur</option>
                          <option value="Madame">Madame</option>
                        </select>
                      </div>

                      <div class="form-row">
                        <div class="col-md-6 form-group">
                          <input v-model="form.firstname"  type="text" name="firstname" class="form-control" id="firstname" placeholder="Votre Nom" />
                        </div>
                        <div class="col-md-6 form-group">
                          <input v-model="form.lastname"  type="text" class="form-control" name="lastname" id="lastname" placeholder="Votre prénom" />
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-6 form-group">
                        <input  type="email" v-model="form.email" class="form-control" name="email" id="email" placeholder="Votre Email" />
                        </div>
                        <div class="col-md-6 form-group">
                          <input type="tel" v-model="form.tel" name="tel" id="tel" class="form-control" placeholder="Votre numéro de téléphone">
                        </div>
                      </div>

                        <div class="form-group">
                        <h4><i class="bx bx-list-ul"></i> Service</h4>
                        <select name="service" id="service" v-model="form.service" class="form-control">
                          <option value="Transformation digitale">Transformation digitale</option>
                          <option value="Formation Internet des objets">Formation Internet des objets</option>
                          <option value="Conseil numérique">Conseil numérique</option>
                        </select>
                        </div>
                      
                        <div class="form-group">
                          <textarea v-model="form.message" name="message" id="besoin" cols="30" rows="10" class="form-control" placeholder="Votre besoin !"></textarea>
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

                    <div class="row mt-5 justify-content-center" data-aos="fade-up" v-if="step === 2">
                      <div class="col-lg-10">
                        <h4 class="text-info"><i class="bx bx-calendar"></i>Date et heure du rendez-vous</h4>
                        <VueCtkDateTimePicker v-model="form.date" min-date="2020-07"  label="Veuillez choisir une date" only-date no-weekends-days inline  format="DD-MM-YYYY"  button-now-translation="La date d'ajourd'hui"></VueCtkDateTimePicker>
                      </div>
                      <div class="col-lg-10">
                        <VueCtkDateTimePicker v-model="form.time" v-bind:disabledHours="disabledHours"  format="HH:mm" minute-interval=30 only-time inline ></VueCtkDateTimePicker>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer" v-if="step === 2">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                    <button @click.prevent="prev()" class="btn btn-info">Précédent</button>
                    <button @click.prevent="getDateTime" type="button" class="btn btn-success">Enregistrer</button>
                  </div>
                </div>
              </div>
            </div> 

          </div> <!-- End container -->
    </section><!-- End Contact Section -->
    </div>
</template>

<script>
    export default {
        data(){
            return {
                form : new Form({
                  gender : '',
                  firstname : '',
                  lastname : '',
                  email : '',
                  tel : '',
                  service : '',
                  message : '',
                  date : '',
                  time : '',
                  
                }),
                valid : false,
                step : 1 ,
                disabledHours : ['00','01','02','03','04','05','06','07','08','13','14','18','19','20','21','22','23']
            }
        },

        methods : {
            getDateTime(){
                Swal.fire({
                    title: 'Rendez-vous avec ' + this.gender + ' ' + this.lastname + ' ' + this.firstname ,
                    text: 'Date : ' + this.date + ' | Heure :  ' + this.time + ' | Service : ' + this.service,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#25AB20',
                    cancelButtonColor : '#F51B1B',
                    confirmButtonText: 'Confirmer',
                    cancelButtonText : 'Annuler'
                    }).then((result) => {
                        // Send request to the server
                    if(result.value){
                            this.form.delete('module/'+id)
                        .then( () => {
                            Toast.fire({
                            icon: 'success',
                            title: 'Module supprimé avec succès'
                            })
                        })
                        .catch( () => {
                                Swal('Erreur', 'Problème servenue !', 'warning')
                        })
                    }
                    })
                
            },
            prev() {
              this.step--;
            },
            next() {
              this.step++;
            },
        },

       
      
      mounted() {}
    }
</script>
