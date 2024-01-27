import { html, css, LitElement } from 'lit';
import { customElement, property, query } from 'lit/decorators.js';
import KemetInput from 'kemet-ui/dist/components/kemet-input/kemet-input';
import { svgHamburger } from '../assets/svgs';
import styles from './styles';

@customElement('business-nav-top')
class BusinessNavTop extends LitElement {
  static styles = [styles];

  @property({ type: String })
  home: String;

  @property()
  logo: String;

  @property()
  name: String;

  @property()
  logout: String;

  @property({ type: Boolean, reflect: true, attribute: 'logged-in' })
  logged: Boolean;

  @query('kemet-input')
  input: KemetInput;

	render() {
		return html`
      ${this.makeButton()}
      <div>
        <slot></slot>
        <form>
          <kemet-input type="search" filled icon-left="search" placeholder="Search for products!" @keypress=${(event) => this.handleKeyPress(event)}></kemet-input>
          <kemet-button outlined @click=${(event) => this.handleSearch(event)}>
            Go
            <kemet-icon slot="right" icon="chevron-right"></kemet-icon>
          </kemet-button>
        </form>
      </div>
    `;
	}

  handleSearch(event) {
    event.preventDefault();
    window.location.href = `${window.location.origin}/?s=${encodeURI(this.input.value)}&post_type=product`;
  }

  handleKeyPress(event) {
    if (event.key === 'Enter') {
      this.handleSearch(event);
    }
  }

  makeButton() {
    if (window.matchMedia('screen and (max-width: 767px)').matches) {
      return html`
        <button @click="${() => this.toggleDrawer()}">
          <kemet-icon icon="list" size="32"></kemet-icon>
        </button>
      `;
    }
  }

  toggleDrawer() {
    const drawer = document.querySelector('kemet-drawer');
    drawer.opened = !drawer.opened;
  }
}
