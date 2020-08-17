<template>
   <div>
     <card class='stripe-card'
           :class='{ complete }'
           :stripe=stripekey
           :options='stripeOptions'
           @change='complete = $event.complete'
     />
     <button class='pay-with-stripe' @click="pay" :disabled='!complete'>Pay with credit card</button>
   </div>
</template>

<script>
import { Card, createToken } from 'vue-stripe-elements-plus';

export default {
  name: "StripeComponent",
  props:['route','csrf','stripekey','amount'],
  data () {
    return {
      complete: false,
      stripeOptions: {
        // see https://stripe.com/docs/stripe.js#element-options for details
      }
    }
  },
  components: { Card },
  methods: {
    pay () {
      // createToken returns a Promise which resolves in a result object with
      // either a token or an error key.
      // See https://stripe.com/docs/api#tokens for the token object.
      // See https://stripe.com/docs/api#errors for the error object.
      // More general https://stripe.com/docs/stripe.js#stripe-create-token.
      createToken().then(data => {
        axios.post(this.route,{
          stripeToken:data.token.id,
          _token:this.scrf,
          amount:this.amount
        }).then(response=>{
          this.$swal("Good job!",response.data.success, "success").then(()=>{
            window.location.reload();
          });
        }).catch(error=>{
          this.$swal("Oops" ,"Something went wrong!",  "error" );
          console.error(error.response);
        });
      });
    }
  }
}

</script>

<style scoped>

  .stripe-card{
    box-sizing: border-box;
    height: 40px;
    padding: 10px 12px;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
  }

  .stripe-card:focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
  }

  .pay-with-stripe{
    border: none;
    border-radius: 4px;
    outline: none;
    text-decoration: none;
    color: #fff;
    background: #32325d;
    white-space: nowrap;
    display: inline-block;
    height: 40px;
    line-height: 40px;
    padding: 0 14px;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    border-radius: 4px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.025em;
    text-decoration: none;
    -webkit-transition: all 150ms ease;
    transition: all 150ms ease;
    float: left;
    margin-top:25px;
  }

</style>
