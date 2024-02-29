<template>
    <div ref="add_user" class="addnewuser">
        <h2>Add New User</h2><br>
        <form @submit.prevent="submitData" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" v-model="name" id="name" placeholder="Enter your name" required>
                <div class="alert alert-danger" v-if="nameerror">{{ nameerror }}</div>
            </div><br>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" v-model="email" placeholder="Enter your email" required>
                <div class="alert alert-danger" v-if="emailerror">{{ emailerror }}</div>
            </div><br>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" v-model="city" placeholder="Enter your City" required>
                <div class="alert alert-danger" v-if="cityerror">{{ cityerror }}</div>
            </div><br>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" v-model="password" placeholder="Enter your password" required>
                <div class="alert alert-danger" v-if="passworderror">{{ passworderror }}</div>
            </div><br>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="text" class="form-control" v-model="confirmpassword" placeholder="Enter your confirm password"
                    required>
                <div class="alert alert-danger" v-if="confirmerror">{{ confirmerror }}</div>
            </div><br>

            <div class="submit">
                <button class="btn btn-success" type="submit">Submit</button>
                <router-link class="btn btn-warning" to="/users">Cancel</router-link>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "Adduser",
    data() {
        return {
            name: '',
            email: '',
            city: '',
            password: '',
            confirmpassword: '',
            errormessage: '',
            nameerror: '',
            emailerror: '',
            cityerror: '',
            passworderror: '',
            confirmerror: '',
        }
    },
    methods: {
        submitData() {
            axios.post('/users/adduser', {
                name: this.name,
                email: this.email,
                city: this.city,
                password: this.password,
                confirmpassword: this.confirmpassword
            })
                .then((response) => {
                    this.$router.push({path:'/users'});
                })
                .catch(error => {
                    let errorsmessages = error.response.data.errors;
                    // Handle errors here
                    this.nameerror = '';
                    this.emailerror = '';
                    this.cityerror = '';
                    this.passworderror = '';
                    this.confirmerror = '';
                    
                    if (errorsmessages.name) {
                        this.nameerror = errorsmessages.name[0];
                    }
                    if (errorsmessages.email) {
                        this.emailerror = errorsmessages.email[0];
                    }
                    if (errorsmessages.city) {
                        this.cityerror = errorsmessages.city[0];
                    }
                    if (errorsmessages.password) {
                        this.passworderror = errorsmessages.password[0];
                    }
                    if (errorsmessages.confirmpassword) {
                        this.confirmerror = errorsmessages.confirmpassword[0];
                    }

                });
        }
    },
    watch: {
        $route: {
            immediate: true,
            handler(to, from) {
                document.title = to.meta.title || 'Some Default Title';
            }
        },
    }
}
</script>

<style scoped>
.addnewuser {
    max-width: 72%;
    margin-left: 15%;
}

.submit {

    padding-left: 43%;
}
</style>