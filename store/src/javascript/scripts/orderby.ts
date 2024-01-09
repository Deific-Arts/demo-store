const form = document.querySelector('form.woocommerce-ordering');

if (form) {
  const select = form?.querySelector('kemet-select');
  const page = form?.querySelector('input[name=paged]') as HTMLInputElement;

  // TODO fix this properly in a Kemet UI patch
  setTimeout(() =>{
    const shadowSelect = select?.shadowRoot.querySelector('select');

    if (shadowSelect) {
      shadowSelect.addEventListener('change', () => {
        const queryParams = `?orderby=${select.value}&paged=${page.value}&select=${select.value}`;
        location.href = `${location.origin}${location.pathname}${queryParams}`;
      });
    }
  },1);
}
