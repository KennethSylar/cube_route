<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
              <div class=""><a href="javascript:history.back()">Back</a>&nbsp;&nbsp;&nbsp;</div>
              <form>
                <div class="form-group row">
                    <label for="name" class="col-md-8 col-form-label">Variant Name</label>
                    <div class="col-md-8">
                      <input id="name" type="text" class="form-control" name="name" v-model="form.name" required>
                      <input id="name" type="hidden" class="form-control" name="product_id" v-model="form.product_id" required>
                    </div>
                </div>
                <button @click="createVariant" class="btn btn-primary">Save</button>
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
                  product_id: '',
              }
          }
      },
      props: {
        apiData: {
          type: Object,
        }
      },
      methods: {

        async createVariant(e) {
        e.preventDefault()

          if(this.apiData['id'] !== undefined){
            const baseURI = '/api/updateVariant'
            this.form.id = this.apiData.id;

            this.$http.post(baseURI, this.form)
            .then((result) => {
              window.location = document.referrer;
            })
          }
          else{
            const baseURI = '/api/addNewVariant'

            this.$http.post(baseURI, this.form)
            .then((result) => {
              window.location = document.referrer;
            })

          }
        },

        async getUpdateInfo() {
          if(this.apiData['product_id'] !== undefined){
            this.form.product_id = this.apiData.product_id;
          }
          else{
            this.form.name = this.apiData.name;
          }
        }
      },
      mounted(){
        this.getUpdateInfo();
      }

  }
</script>
