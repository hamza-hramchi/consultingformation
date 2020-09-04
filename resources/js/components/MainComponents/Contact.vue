<template>
    <div class="">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
            <div class="d-flex justify-content-between align-items-center">
              <h2>Contact</h2>
            </div>
          </div>
        </section><!-- End Breadcrumbs -->

        <div class="map-section">
          <iframe width="100%" height="200px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=26%20Rue%20DES%20RIGOLES+(CONSULTING%20FORMATION)&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
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
                        <a href="mailto: atmane77@yahoo.fr"><p>atmane77@yahoo.fr</p></a>
                    </div>

                    <div class="col-lg-4 info mt-4 mt-lg-0">
                      <i class="icofont-phone"></i>
                      <h4>Téléphone</h4>
                      <p>+33 6 60 11 12 23</p>
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
        saveMessage(){  
          let loader = this.$loading.show({
                // Optional parameters
                container: this.fullPage ? null : this.$refs.formContainer,
                loader : 'dots',
                canCancel: false,
                onCancel: this.onCancel,
                color : 'green',
                height : 100,
                width : 100,
                backgroundColor: '#ffffff',
              }); 
          this.form.post("/contact") 
            .then(
              () => {
                loader.hide()
                this.$Progress.start();
                this.form.name = '';
                this.form.email = '';
                this.form.title = '';
                this.form.message = '';
                Toast.fire({
                  icon: 'success',
                  title: 'Message envoyé avec succès !',
                  footer : 'Un mail vous sera envoyé pour répondre à vos questions.'
                })
                this.$Progress.finish();
              }
            )
            .catch(
              () => {
                  loader.hide();
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
