<template>
    <div class="container-fuild">
        <h3>Quick Links</h3><hr>
    </div>

</template>

<script>
    export default {
        props:{
            usercount: [Number,String]
        },
        created(){
            this.$toastr.defaultType = "success";
            this.$toastr.s(
                "Welcome Administator, to the dashbaord"
            );
        }
    }

</script>
