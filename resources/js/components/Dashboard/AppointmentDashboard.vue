<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header text-dark text-bold">
                        <i class="nav-icon fas fa-calendar"></i>
                         Gestion des rendez-vous

                        <div class="card-tools">
                            <button class="btn btn-success" @click="add">Ajouter un rendez-vous
                                <i class="fas fa-calendar"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-fixed">
                            <thead>
                                <tr class="text-primary">
                                    <th scope="col">ID</th>
                                    <th scope="col">Civilité</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="rdv in appointments" :key="rdv.id" @click="showDetails(rdv.id)">
                                    <th scope="row">{{ rdv.id }}</th>
                                    <td>{{ rdv.civilite }}</td>
                                    <td>{{ rdv.nom }}</td>
                                    <td>{{ rdv.prenom }}</td>
                                    <td>{{ rdv.service }}</td>
                                    <td>{{ rdv.date }}</td>
                                    <td>
                                        <a style="color:#9F8D0F;" @click="update(rdv)" >Modifier
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a style="color:red;" @click="destroy(rdv.id)"> / Supprimer
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="AppointmentModal" tabindex="-1" role="dialog" aria-labelledby="AppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-show="!editModal" class="modal-title" id="AppointmentModalLabel">Ajouter un rendez-vous</h5>
                    <h5 v-show="editModal" class="modal-title" id="AppointmentModalLabel">Modifier un rendez-vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="!editModal ? saveAppointment() : updateAppointment()" class="php-email-form">
                        <h4 class="text-info"><i class="fas fa-user"></i> Les informations personnelles</h4><hr>

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

                        <h4 class="text-info"><i class="fas faa-calendar"></i> Date et heure du rendez-vous</h4><hr>
                        <div class="form-group">
                            <input v-model="form.date"  v-bind:min="today"  type="date" name="date" id="date" class="form-control" :class="{ 'is-invalid': form.errors.has('date') }">
                            <has-error :form="form" field="date"></has-error>
                        </div>
                      
                        <div class="form-group">
                            <select v-model="form.time" name="time" id="time" class="form-control"  :class="{ 'is-invalid': form.errors.has('time') }">
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                            </select>
                            <has-error :form="form" field="time"></has-error>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                            <button v-show="!editModal" class="btn btn-success">Enregistrer</button>
                            <button v-show="editModal" class="btn btn-info">Modifier</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
                appointments : {},
                form : new Form({
                    id : '',
                    civilite : '',
                    nom : '',
                    prenom : '',
                    email : '',
                    telephone : '',
                    service : '',
                    message : '',
                    date : '',
                    time : ''
                }),
                editModal : true,
                today : new Date().getFullYear() + '-' + ('0'+(new Date().getMonth()+1)).slice(-2) + '-' + new Date().getDate(),
                validateTime : '',

            }
        },

        methods : {
            getAppointments(){
                axios.get("appointment").then (( {data} ) => (this.appointments = data));
            },

            update(rdv){
                this.editModal = true;
                this.form.fill(rdv);
                this.form.clear(); // clear errors
                $("#AppointmentModal").modal("show")     
            },

            destroy(id){
                Swal.fire({
                    title: 'Suppression du rendez-vous',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer'
                    }).then((result) => {
                        // Send request to the server
                    if(result.value){
                            this.form.delete('appointment/'+id)
                        .then( () => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Rendez-vous supprimé !',
                            })
                        })
                        .catch( () => {
                                Swal('Failed', 'Something was wrong !', 'warning')
                        })
                    }
                    })
            },

            add(){
                this.form.civilite = '';
                this.editModal = false;
                this.form.nom = '';
                this.form.prenom = '';
                this.form.email = '';
                this.form.telephone = '';
                this.form.service = '';
                this.form.message = '';
                this.form.date = '';
                this.form.time = '';
                $("#AppointmentModal").modal("show");
            },

            saveAppointment(){
                let dateName = new Date(this.form.date).getUTCDay();
                if((dateName==0 ) || (dateName==6)){
                    Swal.fire({
                        position: 'top',
                            icon: 'info',
                            title: 'Veuillez choisir une autre date',
                            showConfirmButton: false,
                            timer: 4000
                        })
                    stop();
                }
                else{
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
                this.form.post('/appointment')
                .then((message) => {
                  this.validateTime = message.data
                  loader.hide()
                    if(message.data==0){
                      Swal.fire({
                        position: 'top',
                        icon: 'info',
                        title: 'Veuillez choisir une autre date',
                        showConfirmButton: false,
                        timer: 5000
                      })
                    }
                    
                else if(message.data == this.form.time){
                    this.$Progress.start();
                    Swal.fire({
                        title: 'Rendez-vous avec ' + this.form.civilite + ' ' + this.form.prenom + ' ' + this.form.nom ,
                        text: 'Date : ' + this.form.date + ' | Heure :  ' + this.form.time + ' | Service : ' + this.form.service,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#25AB20',
                        confirmButtonText: 'Ok',
                        }).then((result) => {
                          if(result.value){
                            $("#AppointmentModal").modal("hide");
                          }
                        })
                        this.$Progress.finish();
                }
                  
                else{
                    Swal.fire({
                        position: 'top',
                        icon: 'warning',
                        title: "Rendez-vous indisponible, nous vous proposons :  " + this.validateTime,
                        showConfirmButton: false,
                        timer: 5000
                      })
                }
                  
                }).catch(() => {
                  this.$Progress.start();
                  loader.hide()
                  this.$Progress.fail();
                })
                }
                
            },

            updateAppointment(){
                let dateName = new Date(this.form.date).getUTCDay();
                if((dateName==0 ) || (dateName==6)){
                    Swal.fire({
                        position: 'top',
                            icon: 'info',
                            title: 'Veuillez choisir une autre date',
                            showConfirmButton: false,
                            timer: 4000
                        })
                    stop();
                }
                else{
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
                this.form.put('appointment/'+ this.form.id)
                .then((message) => {
                  this.validateTime = message.data
                  loader.hide()
                    if(message.data==0){
                      Swal.fire({
                        position: 'top',
                        icon: 'info',
                        title: 'Veuillez choisir une autre date',
                        showConfirmButton: false,
                        timer: 5000
                      })
                    }
                    
                else if(message.data == this.form.time){
                    this.$Progress.start();
                    Swal.fire({
                        title: 'Rendez-vous avec ' + this.form.civilite + ' ' + this.form.prenom + ' ' + this.form.nom ,
                        text: 'Date : ' + this.form.date + ' | Heure :  ' + this.form.time + ' | Service : ' + this.form.service,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#25AB20',
                        confirmButtonText: 'Ok',
                        }).then((result) => {
                          if(result.value){
                            $("#AppointmentModal").modal("hide");
                          }
                        })
                        this.$Progress.finish();
                }
                  
                else{
                    Swal.fire({
                        position: 'top',
                        icon: 'warning',
                        title: "Rendez-vous indisponible, nous vous proposons :  " + this.validateTime,
                        showConfirmButton: false,
                        timer: 5000
                      })
                }
                  
                }).catch(() => {
                  this.$Progress.start();
                  loader.hide()
                  this.$Progress.fail();
                })
                }
            },

            showDetails(id){
                console.log(id);
            }
        },

        mounted(){
            this.getAppointments();
        },

        created() {
            setInterval(() => {
                this.getAppointments();
            }, 40000);
        }
    }
</script>
