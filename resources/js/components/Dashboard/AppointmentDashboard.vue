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
                                        <a style="color:#9F8D0F;" @click="update()" >Modifier
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
    </div>
</template>

<script>
    export default {
        data() {
            return {
                appointments : {},
                form : new Form({
                    id : '',
                    civilit : '',
                    nom : '',
                    prenom : '',
                    email : '',
                    telephone : '',
                    service : '',
                    message : '',
                    date : '',
                    time : ''
                })
            }
        },

        methods : {
            getAppointments(){
                axios.get("appointment").then (( {data} ) => (this.appointments = data));
                console.log(this.appointments);
            },

            update(){
                console.log(this.appointments);
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
