import { html, css, LitElement } from 'lit';
import { svgHamburger } from '../assets/svgs';

class BusinessHamburger extends LitElement {
  static get styles() {
    return css`
      :host {
        margin-left: auto;
      }

      svg {
        cursor: pointer;
      }
    `
  }

  firstUpdated() {
    this.addEventListener('click', (event) => this.handleClick(event));
  }

  render() {
    return html`
      ${svgHamburger}
    `;
  }

  handleClick(event) {
    event.preventDefault();
    const drawer = document.querySelector('kemet-drawer');
    drawer.opened = !drawer.opened;
  }
}

window.customElements.define('business-hamburger', BusinessHamburger);
