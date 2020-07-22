<template>
    <div>
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
                      <div class="col-lg-10">
                        <h4 class="text-info"><i class="bx bx-calendar"></i>Date et heure du rendez-vous</h4>
                        <VueCtkDateTimePicker v-model="form.date" min-date="2020-07"  label="Veuillez choisir une date" only-date no-weekends-days inline  format="DD-MM-YYYY"  button-now-translation="La date d'ajourd'hui" :class="{ 'is-invalid': form.errors.has('date') }"></VueCtkDateTimePicker>
                        <has-error :form="form" field="date"></has-error>
                      </div>
                      <div class="col-lg-10">
                        <VueCtkDateTimePicker v-model="form.time" v-bind:disabledHours="disabledHours"  format="HH:mm" minute-interval=30 only-time inline :class="{ 'is-invalid': form.errors.has('time') }" ></VueCtkDateTimePicker>
                        <has-error :form="form" field="time"></has-error>
                      </div>
                    </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
