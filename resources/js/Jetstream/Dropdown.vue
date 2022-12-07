<template>
  <li class="nav-item dropdown">
    <a :id="id" class="nav-link" role="button" data-toggle="dropdown" aria-expanded="false">
      <slot name="trigger"></slot>
    </a>

    <div :class="class" class="dropdown-menu dropdown-menu-right_ animate slideIn" :aria-labelledby="id">
      <slot name="content"></slot>
    </div>
  </li>
</template>

<script>
  export default {
    props: {
      id: {
        type: String,
        required: true
      },
      class: {
        type: String,
        required: false
      },
    }
  }
</script>
