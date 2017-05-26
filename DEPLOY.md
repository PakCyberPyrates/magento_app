# Deployment 🚀

| Resource | Link                                            |
|:---------|:------------------------------------------------|
| App page | https://www.zendesk.com/apps/magento            |
| Samson   | https://samson.zende.sk/projects/magento_app    |

## General Rules

- 📢 Notify [mintegrations@zendesk.com](mailto:mintegrations@zendesk.com) before any deployment or when something goes wrong.
- 💬 Notify [#mintegrations-team](https://zendesk.slack.com/messages/C169MJEF8) if you have questions, problems, RAs, permissions.
- 🚒 Follow the [Recovery] (#Recovery) section to learn the rollback scenarios.
- ⏰ Our team is based in Manila (UTC+08:00) (avoid off-hours deployments). With the exception of rollbacks, avoid deploying on a Friday or the day before a public holiday.
- 👮 All production deploys require a deploy buddy.
- ⛔️️ Always verify there is no code-freeze in place, or strict-mode mode is enabled.

### SOC2 Controls Relevant to Deploying


> 🔒 __(SOC2 C.24) Standard Code Deployment:__ All standard source code changes are approved prior to deployment into production using the buddy/ peer approval function within the deployment tool.

> 🔒 __(SOC2 C.25) Separate Environments:__ Code changes are developed and tested in separate environments prior to being deployed into the production environment.

> 🔒 __(SOC2 C.26) Code Testing (QA):__ All code changes, including emergency changes, must successfully undergo automated continuous integration testing. Regular changes are tested prior to being deployed into the production environment. Due to their nature, emergency changes may undergo testing and documentation post-production deploy.

> 🔒 __(SOC2 C.43) Non-standard Deploys:__ Non-standard code deploys are documented and authorized in JIRA tickets. Non-standard changes include: emergency deploys that are completed manually (when the deployment tool is down) and emergency deploys which use the deployment tool, but bypass the buddy/peer approval function.

## Restrictions

Both code-freeze and strict-mode are periods of time when the rules for making changes to the code, including deployments, infrastructure or related resources become more strict.

### Deploy Buddy

> 🔒 __(SOC2 C.24) Standard Code Deployment:__ All standard source code changes are approved prior to deployment into production using the buddy/ peer approval function within the deployment tool.

### Code Freeze

Only production hotfixes and critical changes are allowed to be merged and deployed. This usually happens around big holidays like Christmas. See [Production Freeze](https://zendesk.atlassian.net/wiki/display/ops/Production+Freeze) for more information.

### Strict Mode

> 🔒 __(SOC2 C.43) Non-standard Deploys:__ Non-standard code deploys are documented and authorized in JIRA tickets. Non-standard changes include: emergency deploys that are completed manually (when the deployment tool is down) and emergency deploys which use the deployment tool, but bypass the buddy/peer approval function.

### Acceptance Criteria

> 👮 Take time to verify all the PRs included in this deployment.

## Stages

| Stage      | Zendesk Marketplace                       | Notes |
|:-----------|:------------------------------------------|:------|
| Staging    | https://www.zd-staging.com/apps/magento   |       |
| Production | https://www.zendesk.com/apps/magento      |       |                                                                 

## Deployment Process

> 👮 Take time to verify all the PRs included in this deployment followed our [contribution guidelines](CONTRIBUTING.md).

All deployments are executed using [Samson](https://samson.zende.sk/projects/magento_app), and they will follow this order Staging -> Production.

### Staging

1. Go to the [releases page](https://github.com/zendesk/magento_app/releases) and create a new release tag against master branch. Use [semantic versioning](http://semver.org).
2. Go to [Samson Staging](https://samson.zende.sk/projects/magento_app/stages/staging) and deploy the new release tag.
3. Wait until the deploy is done successfully.
5. Install app on a Zendesk staging account and do the necessary tests. Automatic browser tests are non existent on this app so we have to manually test.

### Production

>⛔️ Only deploy to this stage if staging is healthy and tests were made.

1. Go to [Samson Production](https://samson.zende.sk/projects/magento_app/stages/production) and deploy the healthy tag.
2. Wait until the deploy is done successfully.
3. Install app on Zendesk account and do the necessary tests.

## Recovery

In cases of bad deploy:
1. Revert PR or create another PR that removes the defective change.
2. Get two :+1:'s before merge.
3. Create a new release tag.
4. Deploy the new tag. Deploy Process for environment should still be followed.