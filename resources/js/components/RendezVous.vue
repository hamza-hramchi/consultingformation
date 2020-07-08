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
                  
                  <div class="form-group">
                    <button  type="submit" class="form-control btn btn-success">Envoyer</button>
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
      
      mounted() {}
    }
</script>
