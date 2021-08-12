<template>
   <div>
      <div class = "row justify-content-center">
         <div class = "col-md-8">
            <div class = "card">
               <div class = "card-header">
                  Add Client
                  <div class = "float-right"><a href = "/"><b>View Users</b></a></div>
               </div>
               <div class = "card-body">
                  <form @submit.prevent = "submit">
                     <div class = "alert alert-success" v-show = "success">Client Added</div>
                     <div class = "row">
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputName">Name</label>
                           <input v-model = "fields.name" name = "post[name]" type = "text" class = "form-control" id = "exampleInputName" placeholder = "Enter name">
                           <div v-if = "errors && errors.name" class = "text-danger">{{ errors.name[0] }}</div>
                        </div>
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputEmail1">Email address</label>
                           <input v-model = "fields.email" name = "post[email]" type = "email" class = "form-control" id = "exampleInputEmail1" placeholder = "Enter email">
                           <div v-if = "errors && errors.email" class = "text-danger">{{ errors.email[0] }}</div>
                        </div>
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputPhone">Phone</label>
                           <input v-model = "fields.phone" name = "post[phone]" type = "number" class = "form-control phone" id = "exampleInputPhone" placeholder = "Enter phone">
                           <div v-if = "errors && errors.phone" class = "text-danger">{{ errors.phone[0] }}</div>
                        </div>
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputAddress">Address</label>
                           <input v-model = "fields.address" name = "post[address]" type = "text" class = "form-control" id = "exampleInputAddress" placeholder = "Enter Address">
                           <div v-if = "errors && errors.address" class = "text-danger">{{ errors.address[0] }}</div>
                        </div>
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputNationality">Nationality</label>
                           <input v-model = "fields.nationality" name = "post[nationality]" type = "text" class = "form-control" id = "exampleInputNationality" placeholder = "Enter Nationality">
                           <div v-if = "errors && errors.nationality" class = "text-danger">{{ errors.nationality[0] }}</div>
                        </div>
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputPhone">Gender</label>
                           <select v-model = "fields.gender" name = "post[gender]" class = "form-control" id = "">
                              <option value = "male">Male</option>
                              <option value = "female">Female</option>
                           </select>
                           <div v-if = "errors && errors.gender" class = "text-danger">{{ errors.gender[0] }}</div>
                        </div>
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputEducationBackground">Education background</label>
                           <input v-model = "fields.education" name = "post[education]" type = "text" class = "form-control" id = "exampleInputEducationBackground" placeholder = "Enter Education background">
                           <div v-if = "errors && errors.education" class = "text-danger">{{ errors.education[0] }}</div>
                        </div>
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputNationality">Preferred mode of contact</label>
                           <select v-model = "fields.contact" name = "post[contact]" class = "form-control">
                              <option value = "Email">Email</option>
                              <option value = "Phone">Phone</option>
                              <option value = "None">None</option>
                           </select>
                           <div v-if = "errors && errors.contact" class = "text-danger">{{ errors.contact[0] }}</div>
                        </div>
                        <div class = "form-group col-md-6">
                           <label for = "exampleInputDob">Date of birth</label>
                           <input v-model = "fields.dob" name = "post[dob]" type = "date" class = "form-control" id = "exampleInputDob" placeholder = "Enter Date of Birth">
                           <div v-if = "errors && errors.dob" class = "text-danger">{{ errors.dob[0] }}</div>
                        </div>
                     </div>
                     <button type = "submit" class = "btn btn-primary">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
   export default {
      data: function () {
         return {
            fields: {},
            success: false,
            errors: {},
         }
      },
      methods: {
         submit() {
            let that = this;
            this.errors = {};
            axios.post('/../api/clients-api/store', this.fields)
                  .then((response) => {
                     this.fields = {};
                     this.success = true;
                  })
                  .catch(function (error) {
                     if (error.response.status === 422) {
                        that.errors = error.response.data.errors || {};
                     }
                  });
         },
      }
   }
</script>
