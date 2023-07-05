<template>
    <div>
        <h2 class="text-6xl">Create User</h2>
        <form @submit.prevent="submitForm" id="createuser">

            <div class="flex justify-center gap-4">
                <div>
                    <label for="fname">First Name:</label><br>
                    <input type="text" id="fname" v-model="newContact.firstName" required><br>
                </div>
                <div>
                    <label for="lname">Last Name:</label><br>
                    <input type="text" id="lname" v-model="newContact.lastName" required><br>
                </div>
            </div>

            <div class="flex justify-center gap-4">
                <div>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" v-model="newContact.email" required><br>
                </div>
                <div>
                    <label for="phone">Phone:</label><br>
                    <input type="text" id="phone" v-model="newContact.phone" required><br>
                </div>
            </div>

            <button type="submit" class="button button-rimary">Submit</button>
        </form>
    </div>
</template>
<style>
form {
    margin-bottom: 60px;
}

input {
    border: 1px solid #ccc;
    margin-bottom: 20px;
}
</style>
  
<script>
export default {

    data() {
        return {
            postData: [],
            newContact: {
                firstName: '',
                lastName: '',
                email: '',
                phone: ''
            },
            wpData: wpData
        }
    },
    methods: {
        submitForm() {

            const form = document.getElementById('createuser');

            const formData = {
                title: this.newContact.firstName,
                acf: {
                    'first_name': this.newContact.firstName,
                    'last_name': this.newContact.lastName,
                    'email': this.newContact.email,
                    'phone': this.newContact.phone
                },
                status: 'publish'
            };

            fetch(`${this.wpData.rest_url}/wp/v2/contacts`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-WP-Nonce': wpData.nonce
                },
                body: JSON.stringify(formData)
            })
                .then(response => response.json())
                .then(data => {
                    // Successfully created new contact post, now do something with the response
                    console.log(data);
                    form.reset();
                })
                .catch(error => {
                    // Handle error
                    console.log(error);
                });
        }
    }
};
</script>