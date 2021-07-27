<template>
    <div>
        <h1>Login</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <div  :class="!isValid ? ' is-invalid' : ''">
                            <span class="alert alert-error" role="alert" v-if="!isValid">
                                <strong>These credentials do not match our records.</strong>
                            </span>
                        </div>
                        <form method="POST" @submit.prevent="login">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus v-model="email" :class="!isValid ? ' is-invalid' : ''">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" v-model="password"  :class="!isValid ? ' is-invalid' : ''">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
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
    data () {
        return {
            email: '',
            password: '',
            isValid: true,
        }
    },

    methods: {
        login () {
            this.$store
                .dispatch('login', {
                    email: this.email,
                    password: this.password
                })
                .then(() => {
                    this.isValid = true;
                    this.$router.push({ name: 'AllContacts' })
                })
                .catch(err => {
                    this.isValid = false;
                    console.log(err)
                })
        }
    }
}
</script>
