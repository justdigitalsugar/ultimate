<template>
    <div class="signup">
        <h2 class="text-center h2">Create User</h2>
        <div class="form-container">
                    <form @submit.prevent="submitForm" id="createuser">

            <div class="flex justify-center gap-4">
                <div>
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" v-model="newContact.firstName" required><br>
                </div>
                <div>
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" v-model="newContact.lastName" required><br>
                </div>
            </div>

            <div class="flex justify-center gap-4">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" v-model="newContact.email" required>
                    <p v-if="errors.email" class="error-message">{{ errors.email }}</p>
                    <br>
                </div>
                <div>
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" v-model="newContact.phone" required>
                    <p v-if="errors.phone" class="error-message">{{ errors.phone }}</p>
                    <br>
                </div>
            </div>

            <button type="submit" class="button-submit mx-auto">Register Contact</button>
        </form>
        </div>

    </div>
</template>
<style>
form {
    margin-bottom: 60px;
}

input {
    border: 1px solid #ccc;
}
label {
    margin-top:12px;
    display:block;
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
            errors: {
                email: '',
                phone: ''
            },
            wpData: wpData
        }
    },
    methods: {
        submitForm() {
            const form = document.getElementById('createuser');
            
            // Clear previous errors
            this.errors.email = '';
            this.errors.phone = '';

            // Validate email and phone
            if (!this.isValidEmail(this.newContact.email)) {
                this.errors.email = 'Invalid email.';
            }
            if (!this.isValidUKPhone(this.newContact.phone)) {
                this.errors.phone = 'Invalid UK phone number.';
            }

            // If there are errors, stop the function
            if (this.errors.email || this.errors.phone) {
                return;
            }

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
        },
        isValidEmail(email) {
            // Standard email regex
            const regex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
            return regex.test(email);
        },
        isValidUKPhone(phone) {
            // UK phone number regex
            const regex = /^((\+44)|(0)) ?\d{4} ?\d{6}$/;
            return regex.test(phone);
        }
    }
};
</script>