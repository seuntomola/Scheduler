<template>
    <DashboardLayout>
      <template #default>
        <div>
          <h2>Edit Location</h2>
  
          <div v-if="$page.props.errors" class="alert-error">
            <ul>
              <li v-for="(msg, field) in $page.props.errors" :key="field">
                {{ field }}: {{ msg[0] }}
              </li>
            </ul>
          </div>
  
          <!-- The form posts a PUT request to /locations/{location} -->
          <form :action="route('locations.update', location.id)" method="post">
            <input type="hidden" name="_method" value="put" />
  
            <div>
              <label>Name:</label>
              <input type="text" name="name" :value="location.name" />
            </div>
  
            <div>
              <label>Type:</label>
              <select name="type">
                <option
                  value="general"
                  :selected="location.type==='general'"
                >
                  General
                </option>
                <option
                  value="college"
                  :selected="location.type==='college'"
                >
                  College
                </option>
                <option
                  value="cbt"
                  :selected="location.type==='cbt'"
                >
                  CBT
                </option>
              </select>
            </div>
  
            <div>
              <label>Capacity:</label>
              <input type="number" name="capacity" min="1" :value="location.capacity" />
            </div>
  
            <div>
              <label>Active?</label>
              <input
                type="checkbox"
                name="is_active"
                value="1"
                :checked="location.is_active"
              />
            </div>
  
            <button type="submit">Update</button>
          </form>
  
          <inertia-link :href="route('locations.index')">
            Back to Locations
          </inertia-link>
        </div>
      </template>
    </DashboardLayout>
  </template>
  
  <script>
  import DashboardLayout from '../../Layouts/DashboardLayout.vue';
  
  export default {
    name: 'EditLocation',
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
  .alert-error {
    background: #f8d7da;
    padding: 1rem;
    margin-bottom: 1rem;
    border: 1px solid #f5c6cb;
  }
  </style>
  