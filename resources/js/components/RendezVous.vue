<template>
    <div class="container">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
            <div class="d-flex justify-content-between align-items-center">
              <h2>Besoin de renseignements !</h2>
              <h2>Rendez-vous avec un de nos agents</h2>
            </div>
          </div>
        </section><!-- End Breadcrumbs -->

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
              <div class="col-lg-10">

                <form class="php-email-form">
                    <div class="form-row form-group">
                        <h5><i class="bx bx-user text-info"></i> Informations personnelles</h5>
                    </div>
                    <hr>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <input  type="text" name="prenom" class="form-control"  placeholder="Votre Prénom" />
                    <!--  <has-error :form="form" field="prenom"></has-error> -->
                    </div>
                    <div class="col-md-6 form-group">
                      <input  type="text" class="form-control" name="nom"  placeholder="Votre Nom" />
                    <!--  <has-error :form="form" field="nom"></has-error> -->
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <input type="email" name="email" class="form-control"  placeholder="Votre Email" />
                    <!--  <has-error :form="form" field="email"></has-error> -->
                    </div>
                    <div class="col-md-6 form-group">
                      <input  type="tel" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" class="form-control" name="tel"  placeholder="Votre Numéro de téléphone" />
                      <small>Format : 0X XX XX XX XX</small>
                    <!--  <has-error :form="form" field="tel"></has-error> -->
                    </div>
                  </div>

                  <div class="form-row form-group">
                        <h5><i class="bx bx-list-ul text-info"></i> Service</h5>
                    </div>
                    <div class="form-row form-group">
                        <select name="service" id="service" class="form-control" v-model="service">
                            <option value="MANAGEMENT">Management</option>
                            <option value="IOT">IOT</option>
                            <option value="RH">RH</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h5><i class="bx bx-calendar text-info"></i> Date et heure du rendez-vous</h5>
                    </div>
                    <div class="form-row form-group">
                        <VueCtkDateTimePicker v-model="date" min-date="2020-07"  label="Veuillez choisir une date" only-date no-weekends-days inline format="DD-MM-YYYY"  button-now-translation="La date d'ajourd'hui"></VueCtkDateTimePicker>
                    </div>

                    <div class="form-row form-group">
                        <VueCtkDateTimePicker v-model="time" disabledHours[00,01]  format="hh:mm" minute-interval=30 only-time no-weekends-days inline></VueCtkDateTimePicker>
                    </div>
                <hr>
                  <div class="form-row form-group">
                      <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="valid" v-model="valid">
                            <label class="form-check-label" for="valid">Je confirme la validité des informations personnelles ci-dessus.</label>
                            </div>                      
                    <button @click.prevent="getDateTime"  type="submit" class="form-control btn btn-success">Envoyer</button>
                  </div>
                </form>
              </div>

            </div>

          </div>
    </section><!-- End Contact Section -->
    </div>
</template>

<script>
    export default {
        data(){
            return {
                date : '',
                time : '',
                service : '',
                valid : false
            }
        },

        methods : {
            getDateTime(){
                Swal.fire({
                    title: 'Informations du rendez-vous' ,
                    text: 'Le: ' + this.date + ' à ' + this.time + '. Service : ' + this.service,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Confirmer',
                    cancelButtonText : 'Annuler'
                    })
                
            }
        },
      
      mounted() {}
    }
</script>
