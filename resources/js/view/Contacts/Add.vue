-<template>
    <div>
        <h3 class="text-center">Add Contact</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addContact">
                    <div  :class="!isValid ? ' is-invalid' : ''">
                            <span class="alert alert-error" role="alert" v-if="!isValid">
                                <strong>Provided data was invalid.</strong>
                            </span>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="contact.name"  :class="!isValid ? ' is-invalid' : ''">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" v-model="contact.email" :class="!isValid ? ' is-invalid' : ''">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" v-model="contact.phone" :class="!isValid ? ' is-invalid' : ''">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Contact</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            contact: {},
            isValid: true,
        }
    },
    methods: {
        addContact() {

            this.axios
                .post('contact/add', this.contact)
                .then(response => (
                    this.$router.push({name: 'home'})
                ))
                .catch(error => {
                        this.isValid = false;
                        console.log(error)
                    }
                )
                .finally(() => this.loading = false)
        }
    }
}
</script>
