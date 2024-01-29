import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  connect() {
    const toastContainer = document.getElementById('toast-container');
    if (this.element.parentNode !== toastContainer) {
      console.log(this.element);
      toastContainer.appendChild(this.element);
      return;
    }

    setTimeout(() => {
      this.close();
    }, 5000);
  }

  close() {
    const toast = this.element;
    toast.classList.add('hide');
    setTimeout(() => {
      toast.remove();
    }, 1000);
  }
}
