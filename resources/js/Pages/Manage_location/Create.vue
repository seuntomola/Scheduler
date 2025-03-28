<template>
    <DashboardLayout>
      <template #default>
        <div>
          <h2>Create New Location</h2>
  
          <!-- Show validation errors if any -->
          <div v-if="$page.props.errors" class="alert-error">
            <ul>
              <li v-for="(msg, field) in $page.props.errors" :key="field">
                {{ field }}: {{ msg[0] }}
              </li>
            </ul>
          </div>
  
          <!-- The form posts to locations.store -->
          <form :action="route('locations.store')" method="post">
            <div>
              <label>Name:</label>
              <input type="text" name="name" />
            </div>
  
            <div>
              <label>Type:</label>
              <select name="type">
                <option value="general">General</option>
                <option value="college">College</option>
                <option value="cbt">CBT</option>
              </select>
            </div>
  
            <div>
              <label>Capacity:</label>
              <input type="number" name="capacity" min="1" />
            </div>
  
            <div>
              <label>Active?</label>
              <input type="checkbox" name="is_active" value="1" checked />
            </div>
  
            <button type="submit">Save</button>
          </form>
  
          <!-- Link back to Index -->
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
    name: 'CreateLocation',
    components: {
      DashboardLayout,
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
  