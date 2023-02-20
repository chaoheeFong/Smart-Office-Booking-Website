<script>
import Button from 'primevue/button';

export default {
    components: {
        Button
    },
}
</script>

<template>
    <div class="grid">
        <div class = "col-6">
            <h1>Latest Booking</h1>
        </div>
        <div class="col-6">
            <div> 
                <h1>Booking Summary</h1>
                
            </div>
            <div>
                <h1>Quick Actions</h1>
                <Button>
                    <icon class="pi pi-book p-2"/>
                    <span>Add Booking</span>
                </Button>
                <Button>
                    <icon class="pi pi-home p-2"/>
                    <span>Add Room</span>
                </Button>
            </div>
        </div>
    </div>
</template>

<style lang="sass" scoped>

</style>