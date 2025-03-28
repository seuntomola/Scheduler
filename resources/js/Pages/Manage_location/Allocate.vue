<template>
    <DashboardLayout>
      <template #default>
        <div>
          <h2>Allocate Location: {{ location.name }}</h2>
  
          <p>
            Type: {{ location.type }} |
            Capacity: {{ location.capacity }}
          </p>
  
          <p>
            In a real app, you might collect date/time or occupant info here.
          </p>
  
          <!-- POST to /locations/{id}/allocate -->
          <form :action="route('locations.allocate', location.id)" method="post">
            <button type="submit">Allocate Now</button>
          </form>
  
          <inertia-link :href="route('locations.index')">Back</inertia-link>
        </div>
      </template>
    </DashboardLayout>
  </template>
  
  <script>
  import DashboardLayout from '../../Layouts/DashboardLayout.vue';
  
  export default {
    name: 'AllocateLocation',
    components: {
      DashboardLayout,
    },
    props: {
      location: {
        type: Object,
        required: true,
      },
    },
  };
  </script>
  
  <style scoped>

  </style>
  