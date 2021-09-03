<template>
<b-nav toggleable="lg" class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    <a href="#" class="navbar-brand">
      <img src="/img/logo.png" width="30" height="30" class="d-inline-block align-text-top" alt="Pokemon API">
     &nbsp; Pokemon API
    </a>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
            <a href="" class="nav-item nav-link">{{ user.firstname }} &nbsp;</a>
        </div>
        <div>
        <b-dropdown size="sm" id="dropdown-right" right text="User" class="md-2">
        <b-dropdown-item v-b-modal.modal-i>Profile</b-dropdown-item>
        <b-dropdown-item @click="logout">Logout</b-dropdown-item>
        </b-dropdown>
      </div>
    </div>
  <!--================== MODAL ==================-->
    
   <b-modal no-close-on-backdrop id="modal-i" title="Account Setting" :header-bg-variant="headerBgVariant"
      :header-text-variant="headerTextVariant" hide-footer>
      <b-form @submit="updateinfo">
        <b-form-group label="Firstname"
          label-for="name-input"
        >
          <b-form-input
            id="name-input"
            v-model="user.firstname"
            required
          >
          </b-form-input>
         </b-form-group>
          <b-form-group label="Lastname"
          label-for="name-input"
          >
          <b-form-input
            id="name-input"
            v-model="user.lastname"
            required
          >
          </b-form-input>
         </b-form-group>
         <b-form-group label="Birthday"
          label-for="name-input"
          >
          <b-form-input
            id="name-input"
            v-model="user.birthday"
            required
          >
          </b-form-input>
         </b-form-group>
         <b-button class="mt-3" variant="outline-primary">Update</b-button>
      </b-form>
    </b-modal>  
</b-nav>

</template>

<script>
import axios  from 'axios'
export default {
  props: ['user'],
  data() {
    return {
      isLoggedIn: false,
      headerBgVariant: 'dark',
      headerTextVariant: 'light',
    }
  },
  mounted() {
      console.log(this.user);
  },
  methods: {
    logout() {
      localStorage.removeItem('tweetr-token')
      axios.post('/logout')
       .then(() => location.href = '/')
     },
     updateinfo() {
       let uri = 'http://127.0.0.1:8000/api/items/'+this.user.id; 
       axios
      .patch(uri, this.user)
      .then((res) => {
        this.user = res.data;
      console.log(this.user);
        })
     }  
  }
}
</script>


