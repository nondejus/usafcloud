<template>
  <div>
    <form action>
      <!-- Step 1: Select Type -->
      <div class="border border-solid mb-2">
        <h3 class="absolute text-base text-muted p-3 border-bottom border-right border-solid">Step 1</h3>

        <label
          for
          class="text-base text-center block mb-3 mt-5"
        >Who should we provision this GSuite account for?</label>

        <div class="flex justify-center align-middle m-4">
          <div
            class="w-1/2 p-3 rounded mr-1 text-center text-base hover:shadow border border-solid"
            :class="[ provisionFor == 'user' ? 'bg-blue-lightest' : 'bg-gray-ligter' ]"
            style="cursor:pointer"
            @click="provisionFor = 'user'"
          >A User</div>
          <div
            class="w-1/2 p-3 rounded ml-1 text-center text-base hover:shadow border border-solid"
            :class="[ provisionFor == 'organization' ? 'bg-blue-lightest' : 'bg-gray-ligter' ]"
            style="cursor:pointer"
            @click="provisionFor = 'organization'"
          >An Organization</div>
        </div>
      </div>

      <!-- Step 2: Select entity -->
      <div class="border border-solid mb-2" v-if="provisionFor === 'organization'">
        <h3 class="absolute text-base text-muted p-3 border-bottom border-right border-solid">Step 2</h3>

        <label for class="text-base text-center block mb-3 mt-5">Select desired organization</label>

        <div class="m-4">
          <organizations-select></organizations-select>
        </div>
      </div>

      <div class="border border-solid mb-2" v-if="provisionFor === 'user'">
        <h3 class="absolute text-base text-muted p-3 border-bottom border-right border-solid">Step 2</h3>

        <label for class="text-base text-center block mb-3 mt-5">Select desired user</label>

        <div class="m-4">
          <users-select></users-select>
        </div>
      </div>

      <!-- Step 3: Set email handle -->
      <div class="border border-solid">
        <h3 class="absolute text-base text-muted p-3 border-bottom border-right border-solid">Step 3</h3>

        <label for class="text-base text-center block mb-3 mt-5">Desired Email Handle?</label>

        <div class="m-4">
          <input type="email" class="form-control" required placeholder="john.doe@us.af.mil">
        </div>
      </div>

      <!--  -->
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: [],
      provisionFor: ""
    };
  },
  mounted() {
    //
  },
  methods: {}
};
</script>
