<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
              <div class=""><a href="javascript:history.back()">Back</a>&nbsp;&nbsp;&nbsp;</div>
              <form>
                <div class="form-group row">
                    <label for="name" class="col-md-8 col-form-label">Category Name</label>
                    <div class="col-md-8">
                      <input id="name" type="text" class="form-control" name="name" v-model="form.name" required>
                    </div>
                </div>
                <button @click="createCategory" class="btn btn-primary">Save</button>
              </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    data(){
          return{
              form: {
                  name: '',
              }
          }
      },
      props: {
        apiData: {
          type: Object,
        }
      },
      methods: {

        async createCategory(e) {
        e.preventDefault()

          if(this.apiData !== undefined){
            const baseURI = '/api/updateCategory'
            this.form.id = this.apiData.id;

            this.$http.post(baseURI, this.form)
            .then((result) => {
              window.location.href = '../home'
            })
          }
          else{
            const baseURI = '/api/addNewCategory'

            this.$http.post(baseURI, this.form)
            .then((result) => {
              window.location.href = 'home'
            })

          }
        },

        async getUpdateInfo() {
          if(this.apiData !== undefined){
            this.form.name = this.apiData.name;
          }
        }
      },
      mounted(){
        this.getUpdateInfo();
      }

  }
</script>
