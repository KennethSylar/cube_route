<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="javascript:history.back()">Back</a>&nbsp;&nbsp;&nbsp;Products</div>

                    <div class="card-body">
                        <p><a href="/add_product">Add Product</a>.</p>

                        <ul v-for="product in apiData" :key="product.id">
                          <li><a :href="`product_variant/${product.id}`">{{ product.name }}</a>
                            <span class="float-right">
                              <a class="btn btn-secondary" :href="`modifyProduct/${product.id}`">Modify</a>&nbsp;
                              <button v-on:click="deleteCategory(product)" class="btn btn-danger">Delete</button>
                            </span>
                            <br /><b>Descrption</b>:&nbsp;&nbsp;<br />{{ product.description}}
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      props: {
        apiData: {
          type: Array,
        }
      },

      methods: {
        async read() {
        const baseURI = '/api/getAllCat'
          this.$http.get(baseURI)
          .then((result) => {
          this.categories = result.data
          })
        },

        async deleteCategory(j) {
        const baseURI = '/api/deleteProduct/'+j.id
          this.$http.get(baseURI)
          .then((result) => {
            location.reload();
          })

        }
      },
    }
</script>
