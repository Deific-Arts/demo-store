import { html, css, LitElement } from 'lit';
import { customElement, property, query } from 'lit/decorators.js';
import KemetInput from 'kemet-ui/dist/components/kemet-input/kemet-input'
import styles from './styles';

@customElement('business-cookie-banner')
class BusinessCookieBanner extends LitElement {
  static styles = [styles];

  @property({ type: Boolean, reflect: true })
  opened: Boolean = localStorage.getItem('business-cookie-banner') !== 'accepts' ;

	render() {
		return html`
      <div>
        <slot></slot>
        <kemet-button variant="pill" outlined @click=${() => this.handleClick()}>Accept Cookies</kemet-button>
      </div>
    `;
	}

  handleClick() {
    this.opened = false;
    localStorage.setItem('business-cookie-banner', 'accepts');
  }
}
