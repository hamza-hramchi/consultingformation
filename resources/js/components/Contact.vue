<template>
    <div class="container">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
            <div class="d-flex justify-content-between align-items-center">
              <h2>Contact</h2>
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
                <form amethod="post" role="form" class="php-email-form">
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom"/>
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="title" id="subject" placeholder="Titre"/>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                  </div>
                  <div class="form-group">
                    <button class="form-control btn btn-success">Envoyer</button>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
