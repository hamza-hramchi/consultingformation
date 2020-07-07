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

                <form class="php-email-form">
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <input v-model="form.name" type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" :class="{ 'is-invalid': form.errors.has('name') }"/>
                      <has-error :form="form" field="name"></has-error>
                    </div>
                    <div class="col-md-6 form-group">
                      <input v-model="form.email" type="email" class="form-control" name="email" id="email" placeholder="Votre Email" :class="{ 'is-invalid': form.errors.has('email') }"/>
                      <has-error :form="form" field="email"></has-error>
                    </div>
                  </div>
                  <div class="form-group">
                    <input v-model="form.title" type="text" class="form-control" name="title" id="subject" placeholder="Titre" :class="{ 'is-invalid': form.errors.has('title') }"/>
                    <has-error :form="form" field="title"></has-error>
                  </div>
                  <div class="form-group">
                    <textarea v-model="form.message" class="form-control" name="message" rows="5" placeholder="Message" :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                    <has-error :form="form" field="message"></has-error>
                  </div>
                  <div class="form-group">
                    <button @click.prevent="saveMessage"  type="submit" class="form-control btn btn-success">Envoyer</button>
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
          form : new Form({
            name :'',
            email : '',
            title : '',
            message : ''
          })
        }
      },
      
      methods:{
        saveMessage(event){
          this.form.post("/contact")
            .then(
              () => {
                this.$Progress.start();
                this.form.name = '';
                this.form.email = '';
                this.form.title = '';
                this.form.message = '';
                Toast.fire({
                  icon: 'success',
                  title: 'Message envoyé avec succès !'
                })
                this.$Progress.finish();
              }
            )
            .catch(
              () => {
                  this.$Progress.start();
                  this.$Progress.fail();
                }
            );
        },
        
      },

      mounted() {
            //
      }
    }
</script>
