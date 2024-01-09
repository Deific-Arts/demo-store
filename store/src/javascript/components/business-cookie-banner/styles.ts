import { css } from 'lit';

export default css`
  :host {
    display: none;
    color: var(--color-white);
    position: fixed;
    bottom: 0;
    z-index: 999;
    width: 100%;
    padding: 1rem 2rem;
    background: var(--color-primary);
  }

  :host([opened]) {
    display: block;
  }

  div {
    display: flex;
    gap: 1rem;
    align-items: center;
    justify-content: space-between;
    margin: auto;
    max-width: var(--page-width);
  }

  kemet-button[outlined] {
    --kemet-button-color: var(--color-white);
    --kemet-button-border: 2px solid var(--color-white);
    height: 54px;
  }
`;
