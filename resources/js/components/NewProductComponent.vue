<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header"><a href="javascript:history.back()">Back</a>&nbsp;&nbsp;&nbsp;Add / Modify Product</div>

                    <div class="card-body">
                    <form>
                      <div class="form-group row">
                          <label for="name" class="col-md-8 col-form-label">Product name</label>
                          <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" v-model="form.name" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="name" class="col-md-8 col-form-label">Product description</label>
                          <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="description" v-model="form.description" required>
                          </div>
                      </div>

                      <p>Product categories</p>
                      <div v-for="category in apiData['categories']" :key="category.id">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" v-model="form.categories" :value="category.id" name="categories">
                          <label class="form-check-label" for="flexCheckDefault">
                            {{category.name}}
                          </label>
                        </div>
                      </div>
                      <br />
                      <button @click="createCategory" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
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
                    description: '',
                    categories: [],
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

          if(this.apiData['item'] !== undefined){
            const baseURI = '/api/updateProduct'
            this.form.id = this.apiData['item'].id;

            this.$http.post(baseURI, this.form)
            .then((result) => {
              window.location = document.referrer;
            })
          }
          else{
            const baseURI = '/api/addNewProduct'

            this.$http.post(baseURI, this.form)
            .then((result) => {
              window.location = document.referrer;
            })

          }
        },

        async getUpdateInfo() {
          if(this.apiData['item'] !== undefined){
          console.log(this.apiData)
            this.form.name = this.apiData['item'].name;
            this.form.description = this.apiData['item'].description;
          }
        }
      },
      mounted(){
        this.getUpdateInfo();
      }
    }
</script>
