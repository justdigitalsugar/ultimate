<template>
    <div>
        <h2>Create User</h2>
        <form @submit.prevent="createUser">
            <label for="username">Username:</label><br>
            <input type="text" id="username" v-model="newUser.username" required>
            <br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" v-model="newUser.email" required>
            <br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" v-model="newUser.password" required>
            <br>
            <button type="submit" id="registerUser">Create</button>
        </form>
    </div>
</template>
<style>
form {
    margin-bottom: 60px;
}
input {
    border: 1px solid #f4f5f6;
    margin-bottom: 20px;
}
</style>
  
<script>

export default {
    data() {
        return {
            newUser: {
                username: '',
                email: '',
                password: ''
            },
            wpData: wpData
        };
    }
   
};
</script>
  