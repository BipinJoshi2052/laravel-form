<template>
   <div class = "card" :class = "{'loading' : loading}">
      <div :class = "{'hidden' : hidden}" class = "card-header">
         Clients List
         <div class = "float-right">
            <a class = "btn btn-sm btn-warning" href = "/clients/csv_export"><b>Export CSV</b></a>
            <a class = "btn btn-sm btn-success" href = "/clients/post"><b>Add New Client</b></a>
         </div>
      </div>
      <div :class = "{'hidden' : hidden}" class = "card-body">
         <table class = "table table-bordered mt-3">
            <thead>
            <tr>
               <th scope = "col">S.N</th>
               <th scope = "col">Name</th>
               <th scope = "col">Email</th>
               <th scope = "col">Phone</th>
               <th scope = "col">Address</th>
               <th scope = "col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for = "client in clients">
               <th scope = "row">{{client.id}}</th>
               <td>{{client.name}}</td>
               <td>{{client.email}}</td>
               <td>{{client.phone}}</td>
               <td>{{client.address}}</td>
               <td>
                  <a v-bind:href = "'/clients/show/'+ client.id" class = "btn btn-success">View</a>
               </td>
            </tr>
            </tbody>
         </table>
      </div>
   </div>
</template>

<script>
   export default {
      data: function () {
         return {
            clients: [],
            loading: true,
            hidden: true
         }
      },
      mounted() {
         this.loadClients();
      },
      methods: {
         loadClients: function () {
            //load clients from api
            //assign this.loadClients
            //catch error
            axios.get('api/clients-api/list')
                  .then((response) => {
                     this.clients = response.data.data;
                     this.loading = false;
                     this.hidden = false;
                  })
                  .catch(function (error) {
                     console.log(error)
                  });
         }
      }
   }
</script>
