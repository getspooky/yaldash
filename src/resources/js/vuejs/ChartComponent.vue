<template>

    <div>

        <pie-chart v-if="chart == 'pie'" id="users-chart" :data="[['laptop',laptop],['mobile',mobile]]" :colors="['#3e95cd','#8e5ea2']"></pie-chart>

    </div>

</template>

<script>
    export default {
        name: "ChartComponent",
        props:['chart','state'],
        data(){
          return{
              laptop:1,
              mobile:0
          }
        },
        mounted() {

            axios.get(this.state).then((response)=>{

                this.laptop = response.data.laptop;

                this.mobile = response.data.mobile;

            }).catch(error=>{

                console.log(error.response)

            })

        }

    }
</script>

<style scoped>

    #users-chart{
        margin-top:-10px !important;
        margin-bottom:15px !important;
    }

</style>
