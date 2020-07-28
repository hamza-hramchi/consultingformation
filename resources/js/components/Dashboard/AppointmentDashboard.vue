<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header text-dark text-bold">
                        <i class="nav-icon fas fa-user"></i>
                         Gestion des rendez-vous

                        <div class="card-tools">
                            <button class="btn btn-success">Ajouter un rdv
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
                                <tr v-for="rdv in appointments" :key="rdv.id">
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
                                        <a style="color:red;" @click="destroy()"> / Supprimer
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
    <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 v-show="!editModal" class="modal-title" id="AppointmentModalLabel">Add new user</h5>
                <h5 v-show="editModal" class="modal-title" id="AppointmentModalLabel">Update user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <form>
            <div class="modal-body">

                <form>
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
                            <label for="nom">Nom</label>
                          <input v-model="form.nom"  type="text" name="nom" class="form-control" id="nom" placeholder="Votre Nom" :class="{ 'is-invalid': form.errors.has('nom') }" />
                          <has-error :form="form" field="nom"></has-error>
                      </div>

                      <div class="col-md-6 form-group">
                          <label for="prenom">Prénom</label>
                          <input v-model="form.prenom"  type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre Prénom" :class="{ 'is-invalid': form.errors.has('prenom') }" />
                          <has-error :form="form" field="prenom"></has-error>
                      </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-6 form-group">
                        <label for="email">Email</label>
                        <input  type="email" v-model="form.email" class="form-control" name="email" id="email" placeholder="Votre Email" :class="{ 'is-invalid': form.errors.has('email') }" />
                        <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="telephone">Téléphone</label>
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
                            <label for="message">Message</label>
                          <textarea v-model="form.message" name="message" id="besoin" cols="30" rows="10" class="form-control" placeholder="Votre besoin !" :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                          <has-error :form="form" field="message"></has-error>
                        </div>

                      
                      <h4 class="text-info"><i class="bx bx-calendar"></i> Date et heure du rendez-vous</h4><hr>
                      <div class="form-group">
                          <label for="date">Date</label>
                        <input v-model="form.date"   v-bind:min="today"  type="date" name="date" id="date" class="form-control" :class="{ 'is-invalid': form.errors.has('date') }">
                        <has-error :form="form" field="date"></has-error>
                      </div>
                      
                      <div class="form-group">
                        <label for="time">Time</label>
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

                    
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button v-show="!editModal" type="submit" class="btn btn-success">Ajouter rendez-vous</button>
                <button v-show="editModal" type="submit" class="btn btn-info">Modifier le rendez-vous</button>
            </div>
        </form>

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

            destroy(){
                console.log(this.appointments);
            }
        },

        mounted(){
            this.getAppointments();
        },

        created() {
        }
    }
</script>
