# Description

Please answer all questions in this template as completely as possible. Pull requests with missing or incomplete information will not be reviewed or merged.

Please include a summary of the change and which issue is fixed. Also include the relevant motivation and context. List any dependencies that are required for this change.

Fixes # (issue)

## Type of change

Please delete options that are not relevant.

- [ ] Bug fix (non-breaking change which fixes an issue)
- [ ] New feature (non-breaking change which adds functionality)
- [ ] Breaking change (fix or feature that would cause existing functionality to not work as expected)
- [ ] This change requires a documentation update

## How has this been tested?

Please describe the tests that you ran to verify your changes. Provide instructions so the changes can be reproduced. Also list any relevant details about your test configuration.

- [ ] Test A
- [ ] Test B

**Test configuration**

- OS:
- OS version:
- PHP version:

## Checklist

Pull requests are only reviewed and merged when all relevant checks are in a clean state. This includes coding style, tests, and any other checks required by the project.

The coding style must be checked before committing by running:

```bash
composer checkstyle:run
```

- [ ] I ran `composer checkstyle:run` before committing and the coding style check passed
- [ ] I ran `composer composer phpcsfixer:run` to fix possible coding style issues
- [ ] My code follows the style guidelines of this project
- [ ] I have performed a self-review of my own code
- [ ] I have commented my code, particularly in hard-to-understand areas
- [ ] I have made corresponding changes to the documentation
- [ ] My changes generate no new warnings
- [ ] I have added tests that prove my fix is effective or that my feature works
- [ ] New and existing unit tests pass locally with my changes
- [ ] Any dependent changes have been merged and published in downstream modules
- [ ] I answered all questions in this template completely
