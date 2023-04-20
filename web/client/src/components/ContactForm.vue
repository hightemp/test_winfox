<template>
    <h1>Обратная связь</h1>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita quis suscipit ullam optio possimus eligendi ut
        quaerat distinctio rerum, exercitationem cum? Aut laudantium ipsam necessitatibus at commodi mollitia et
        praesentium?</p>

    <form class="w-25 m-auto" @submit.prevent="submitForm">
        <div class="form-group" :class="{ 'has-error': emailError }">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" v-model="email" placeholder="Введите email">
            <span class="error-block" v-if="emailError">{{ emailError }}</span>
        </div>
        <div class="form-group" :class="{ 'has-error': firstNameError }">
            <label for="first_name">Имя</label>
            <input type="text" class="form-control" id="first_name" v-model="firstName" placeholder="Введите имя">
            <span class="error-block" v-if="firstNameError">{{ firstNameError }}</span>
        </div>
        <div class="form-group" :class="{ 'has-error': lastNameError }">
            <label for="last_name">Фамилия</label>
            <input type="text" class="form-control" id="last_name" v-model="lastName" placeholder="Введите фамилию">
            <span class="error-block" v-if="lastNameError">{{ lastNameError }}</span>
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Отправить</button>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            firstName: '',
            lastName: '',
            emailError: '',
            firstNameError: '',
            lastNameError: ''
        };
    },
    components: {
    },
    methods: {
        submitForm() {
            this.emailError = '';
            this.firstNameError = '';
            this.lastNameError = '';

            if (!this.email) {
                this.emailError = 'Введите email';
            } else if (!this.validateEmail(this.email)) {
                this.emailError = 'Некорректный email';
            }

            if (!this.firstName) {
                this.firstNameError = 'Введите имя';
            }

            if (!this.lastName) {
                this.lastNameError = 'Введите фамилию';
            }

            if (this.emailError || this.firstNameError || this.lastNameError) {
                return;
            }

            axios.post('/contact', {
                email: this.email,
                firstName: this.firstName,
                lastName: this.lastName
            })
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
    }
}
</script>

<style>
.error-block {
    color: red;
}
</style>