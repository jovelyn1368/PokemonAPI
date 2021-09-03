<template>
   <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
              <form v-on:submit.prevent="loginform">
                    <h3>Login</h3>
                        <div class="form-group">
                            <input v-model="state.email" type="email" class="form-control" id="email" placeholder="Email Address*" name="email" />
                            <!--<input id="email" type="text" v-model="email" class="form-control" placeholder="Email Address*" />-->
                        </div>
                        <div class="form-group">
                            <input v-model="state.password" type="password" class="form-control" id="password" placeholder="********" name="password" />
                            <!--<input type="password" v-model="password" class="form-control" placeholder="********" value="" />-->
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" value="Login">Login</button>
                        </div>
                        <div class="form-group">
                            <a href="#" class="btnForgetPwd">Forget Password?</a>
                        </div>
              </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <div class="login-logo">
                        <img src="/img/font.png" alt=""/>
                    </div>
                    <form v-on:submit.prevent="registerform">
                    <h3>Register</h3>
                        <div class="form-group">
                            <input v-model="reg.firstname" type="firstname" class="form-control" placeholder="First Name*" value="" required/>
                        </div>
                        <div class="form-group">
                            <input v-model="reg.lastname" type="lastname" class="form-control" placeholder="Last Name*" value="" required/>
                        </div>
                        <div class="form-group" data-provide="datepicker">
                            <input v-model="reg.birthday" type="date" placeholder="Birthday" class="form-control">
                        </div>
                        <div class="form-group">
                            <input v-model="reg.email" type="email" class="form-control" placeholder="Email Address*" value="" required/>
                        </div>
                        <div class="form-group">
                            <input v-model="reg.password" type="password" class="form-control" placeholder="Password*" value="" required/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger" value="Register">Register</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
</template>

<script>
import axios  from 'axios'
import Swal from 'sweetalert2'
    export default {
         data() {
            return {
                isLoggedIn: true,
                 state: {
                    email: '',
                    password: ''
                },
                reg: {
                    firstname: '',
                    lastname: '',
                    birthday: '',
                    email: '',
                    password: ''
                }
            }
        },
        created() {
          if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
        },
        methods: {
        loginform() {
          axios
          .post('http://127.0.0.1:8000/api/login', {
              email:this.state.email,
              password:this.state.password
          })
           .then((response) =>{
            console.log(response["data"]["status"]);
                console.log(this.state.email);
              if(response["data"]["status"] == "success") {
                  Swal.fire({
                      title: "Successfull",
                      text: "Successfully Login",
                      icon: 'success',
                  });
                  window.location.href = "/home"
              }
              else 
              {
                  Swal.fire({
                      title: 'OPPPS',
                      text: "Incorrect Login Credintials!",
                      icon: 'warning',
                  });
              }
          })
          .catch((e) =>{
              console.log(e);
              Swal.fire({
                  title: 'Error',
                  text: e,
                  icon: 'warning',
              });
          })
        },
        registerform(){
            axios
          .post('http://127.0.0.1:8000/api/register', {
                name:this.reg.firstname +' '+ this.reg.lastname,
                firstname:this.reg.firstname,
                lastname:this.reg.lastname,
                birthday:this.reg.birthday,
                email:this.reg.email,
                password:this.reg.password,
          })
           .then((response) =>{
            console.log(response["data"]["status"]);

              if(response["data"]["status"] === "success") {
                  Swal.fire({
                      title: "Successfull",
                      text: "Successfully Register. Sign In to your account!",
                      icon: 'success',
                  });
                   window.location.reload();
              }
              else 
              {
                  Swal.fire({
                      title: 'OPPPS',
                      text: "Incorrect Registration!",
                      icon: 'warning',
                  });
              }
          })
          .catch((e) =>{
              console.log(e);
              Swal.fire({
                  title: 'Error',
                  text: e,
                  icon: 'warning',
              });
          })
        }
      }
    }
</script>

<style scoped>
.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-logo{
    position: relative;
    margin-left: -41.5%;
}
.login-logo img{
    position: absolute;
    width: 20%;
    margin-top: 19%;
    background: #282726;
    border-radius: 4.5rem;
    padding: 5%;
}
.login-form-1{
    padding: 9%;
    background:#282726;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    margin-bottom:12%;
    color:#fff;
}
.login-form-2{
    padding: 9%;
    background: #bb1616;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    margin-bottom:12%;
    color: #fff;
}
.btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.btnForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.btnForgetPwd:hover{
    text-decoration:none;
    color:#fff;
}
</style>



