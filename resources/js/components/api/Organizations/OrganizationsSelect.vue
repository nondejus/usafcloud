<template>
  <div>
    <select name="organization_id" id="organization_id" class="form-control">
      <option
        :value="organization.id"
        v-for="organization in organizations"
        :key="organization.id"
      >{{ organization.name }}</option>
    </select>
  </div>
</template>

<script>
export default {
  data() {
    return {
      organizations: null
    };
  },
  mounted() {
    axios.get("/api/organizations").then(response => {
      this.organizations = response.data;
    });
  },
  methods: {}
};
</script>
