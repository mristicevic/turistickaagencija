<template>
    <div >
        <button class="btn btn-danger text-center " v-on:click.prevent="addTripToCart()">Add to cart
        </button>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                
            }
    },
    props:['tripId','userId']   ,
    methods:{
        async addTripToCart(){  
                
                if(this.userId == 0){
                    this.$toastr.e('You Need to login, To add this product in Cart');
                    return;
                }

                // If user logged in then add item to cart.

                let response = await axios.post('/shopcart', {
                    'trip_Id':this.tripId
                });
            
             this.$root.$emit('changeInCart', response.data.items)
           
            //console.log(response.data);
        }
    }  , 
       mounted() {
            console.log('Component mounted.')
        }
    }
</script>
