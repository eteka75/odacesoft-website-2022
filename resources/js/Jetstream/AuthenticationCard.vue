<template>
  <div class="container">
    <div class="row justify-content-center py-5">
      <div class="col-sm-12 col-md-8 col-lg-8 col-xl-5 py-4">
        <div>
          <slot name="logo" />
        </div>

        <div class=" py-3 p-lg-3">
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>
