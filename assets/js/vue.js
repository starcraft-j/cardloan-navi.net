if (window.vueInstance) {
  window.vueInstance.$destroy();
}

window.vueInstance = new Vue({
  el: '#vue-app',
  data() {
    return {
      isOpen: false,
      selectClass: 1,
      isSupAcc: [],
      isLakePopup: false,
      isStarPopup: false,
      isHikakuTab: 1,
			isHamOpen: false,
    }
  },
  methods: {
    isFormSelect() {
      this.isOpen = !this.isOpen;
    },
    changeClass() {
      this.selectClass++;
    },
    clickedAccBtn(num) {
      this.$set(this.isSupAcc, num, !this.isSupAcc[num]);
    },
    clickedLakePopup() {
      this.isLakePopup = !this.isLakePopup
    },
    clickedStarPopup() {
      this.isStarPopup = !this.isStarPopup
    },
    toggleHikakuTab(num) {
      this.isHikakuTab = num;
    },
		toggleHam() {
			this.isHamOpen = !this.isHamOpen;
		}
  },
	
})