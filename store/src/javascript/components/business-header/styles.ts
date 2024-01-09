import { css } from 'lit';

export default css`
  img {
    max-height: 48px;
  }

  h2 {
    margin: 0;
  }

  div {
    display: flex;
    align-items: center;
  }

  a {
    color: inherit;
  }

  header {
    display: flex;
    justify-content: space-between;
    margin: 0.5rem auto;
    padding: 0;
    max-width: var(--page-width);
  }

  header > div {
    font-size: 1rem;
    display: flex;
    gap: 2rem;
  }

  kemet-avatar {
    --kemet-avatar-background-color: transparent;

    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    padding-left: 4px;
  }

  kemet-avatar span {
    font-size: 0.8rem;
    color: var(--color-white);
    display: inline-flex;
    width: 16px;
    height: 16px;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: rgb(var(--kemet-color-green-700));
  }

  .logo {
    color: rgb(var(--kemet-color-black));
    display: flex;
    gap: 0.5rem;
    align-items: center;
    text-decoration: none;
  }
`;
