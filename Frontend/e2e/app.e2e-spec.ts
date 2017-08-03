import { Bootcamp4Page } from './app.po';

describe('bootcamp4 App', () => {
  let page: Bootcamp4Page;

  beforeEach(() => {
    page = new Bootcamp4Page();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!!');
  });
});
