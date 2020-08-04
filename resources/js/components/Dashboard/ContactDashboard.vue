<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header text-dark text-bold"><i class="fas fa-user"></i> Contact Component</div>
                    <div class="card-body">
                                <table class="table table-hover table-fixed">
                                    <thead>
                                        <tr class="text-primary">
                                            <th scope="col">ID</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Titre</th>
                                        </tr>
                                    </thead>
                                        <tr v-for="contact in contacts" v-bind:key="contact.id" @click="getMesage(contact)">
                                            <td>{{ contact.id }}</td>
                                            <td>{{ contact.name }}</td>
                                            <td>{{ contact.email }}</td>
                                            <td>{{ contact.title }}</td>
                                        </tr>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactModalTitle">{{form.title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <ul class="list-group" v-if="step == 1">
                        <li class="list-group-item">
                            Nom  <h5 class="text-bold"> {{form.name}}</h5>
                        </li>
                        <li class="list-group-item">
                            Email  <h5 class="text-bold"> {{form.email}}</h5> 
                        </li>
                        <li class="list-group-item">
                            Titre  <h5 class="text-bold"> {{form.title}}</h5>
                             </li>
                        <li class="list-group-item">
                            Message  <p class="text-bold"> {{form.message}}</p>
                             </li>
                    <button type="button" class="btn btn-success" @click="step = 2">Répondre</button>
                    </ul>

                    <form v-if="step == 2">
                        <div class="form-group">
                            <label for="email">Destinataire</label>
                            <input type="email" v-model="form.email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reponse">Votre réponse</label>
                            <textarea v-model="form.reponse" name="reponse" id="reponse" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="form-control btn btn-primary" @click="step = 1">Précedent</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="form-control btn btn-success" @click.prevent="sendResponse">Envoyer</button>
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
                contacts : {},
                step : 1,
                form : new Form({
                    id : '',
                    name : '',
                    email : '',
                    title : '',
                    message : '',
                    reponse : '',
                }),
            }
        },

        methods: {
            getContacts(){
                axios.get("/contact")
                    .then( ({data}) => { this.contacts = data});
            },

            getMesage(contact){
                this.form.fill(contact);
                $("#contactModal").modal("show");
            },

            sendResponse() {
                this.form.post("/contact/response")
                    .then( ({data}) => {
                        $("#contactModal").modal("hide");
                        Toast.fire({
                            icon: 'success',
                            title: 'Réponse envoyé avec succès !',
                            })
                    })
                    .catch( () => {
                        console.error();
                    });
            }
        },

        mounted() {
            this.getContacts();
        }
    }
</script>
